<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RohanAuthController extends Controller
{
    public function sendcode($type){
        // -- -1 ??? ? ?? ?????.
        // -- -2 ????? ????.
        // -- -3 Sanctioned or not allowed to have that grade
        // -- -4 Banned IP
        // -- -5 Deleted User
        if (in_array($type, ["php", "asp"])) {
            $id = request()->input("id");
            $passwd = request()->input("passwd");
            $ip = request()->ip();

            $settings = rohanAuthSettings();
            if($settings->maintenance){
                if(!in_array($id, $settings->allowed_on_maintenance)){
                    return response(-20)->header('Content-Type', 'text/plain');
                }
            }

            if($id == null || $passwd == null){
                return response(-1)->header('Content-Type', 'text/plain');
            }
            if(!preg_match("/^[a-zA-Z0-9]+$/", $id) || !preg_match("/^[a-zA-Z0-9]+$/", $passwd)){
                return response(-1)->header('Content-Type', 'text/plain');
            }
            $ret = null;
            $passwd = md5($passwd);

            $stmt = DB::connection("sqlsrv_user")->getPdo()->prepare('exec ROHAN3_SendCode @login_id = :login_id,@login_pw = :login_pw,@ip = :ip,@ret = :ret ');
            $stmt->bindParam(":login_id", $id, \PDO::PARAM_STR);
            $stmt->bindParam(":login_pw", $passwd, \PDO::PARAM_STR);
            $stmt->bindParam(":ip", $ip, \PDO::PARAM_STR);
            $stmt->bindParam(":ret", $ret, \PDO::PARAM_INT|\PDO::PARAM_INPUT_OUTPUT,4);
            $stmt->execute();

            if($ret != 0){
                return response($ret)->header('Content-Type', 'text/plain');
            }else  if($ret == 0){
                $user = User::where("login_id", $id)->first();
                if(!$user){
                    return response(-2)->header('Content-Type', 'text/plain');
                }
                if($user->isBanned()){
                    return response(-4)->header('Content-Type', 'text/plain');
                }
                return response(-202)->header('Content-Type', 'text/plain');
            }
        }
    }
    public function login5($type){
        if (in_array($type, ["php", "asp"])) {
            $id = request()->input("id");
            $passwd = request()->input("passwd");
            $passwd = md5($passwd);
            $ver = request()->input("ver");
            $test = request()->input("test");
            $code = request()->input("code");
            $pcode = request()->input("pcode");
            $nation = request()->input("nation");
            $ip = request()->ip();

            if (
                !preg_match("/^[a-zA-Z0-9]+$/", $id) ||
                !preg_match("/^[a-zA-Z0-9,]+$/", $ver) ||
                !preg_match("/^[a-zA-Z0-9]+$/", $code) ||
                !preg_match("/^[a-zA-Z0-9]+$/", $test) ||
                !preg_match("/^[a-zA-Z0-9]+$/", $pcode) ||
                !preg_match("/^[a-zA-Z0-9]+$/", $nation) ||
                !preg_match("/^[a-zA-Z0-9.:]+$/", $ip)

            ) {
                return response(-1)->header('Content-Type', 'text/plain');
            }

            $authSettings = rohanAuthSettings();
            if ($authSettings->restrict_nation) {
                if (Str::lower($nation) != Str::lower($authSettings->nation)) {
                    return response(-18)->header('Content-Type', 'text/plain');
                }
            }
            if ($authSettings->restrict_exe_version) {
                if (Str::lower($pcode) != Str::lower($authSettings->exe_version)) {
                    return response(-17)->header('Content-Type', 'text/plain');
                }
            }

            //output
            $user_id = null;
            $session_id = null;
            $run_ver = null;
            $bill_no = null;
            $grade = null;
            $ret = null;

            $stmt = DB::connection("sqlsrv_user")->getPdo()->prepare('exec ROHAN4_Login
        @login_id = :login_id,
        @login_pw = :login_pw,
        @nation = :nation,
        @exe_ver = :ver,
        @test = :test,
        @ip = :ip,
        @code = :code,
        @user_id = :user_id,
        @session_id = :session_id,
        @run_ver = :run_ver,
        @bill_no = :bill_no,
        @grade = :grade,
        @ret = :ret');
            $stmt->bindParam(":login_id", $id, \PDO::PARAM_STR);
            $stmt->bindParam(":login_pw", $passwd, \PDO::PARAM_STR);
            $stmt->bindParam(":nation", $nation, \PDO::PARAM_STR);
            $stmt->bindParam(":ver", $ver, \PDO::PARAM_STR);
            $stmt->bindParam(":test", $test, \PDO::PARAM_BOOL);
            $stmt->bindParam(":ip", $ip, \PDO::PARAM_STR);
            $stmt->bindParam(":code", $code, \PDO::PARAM_INT);
            $stmt->bindParam(":user_id", $user_id, \PDO::PARAM_INT | \PDO::PARAM_INPUT_OUTPUT, 4);
            $stmt->bindParam(":session_id", $session_id, \PDO::PARAM_STR | \PDO::PARAM_INPUT_OUTPUT, 36);
            $stmt->bindParam(":run_ver", $run_ver, \PDO::PARAM_STR | \PDO::PARAM_INPUT_OUTPUT, 30);
            $stmt->bindParam(":bill_no", $bill_no, \PDO::PARAM_INT | \PDO::PARAM_INPUT_OUTPUT, 4);
            $stmt->bindParam(":grade", $grade, \PDO::PARAM_INT | \PDO::PARAM_INPUT_OUTPUT, 1);
            $stmt->bindParam(":ret", $ret, \PDO::PARAM_INT | \PDO::PARAM_INPUT_OUTPUT, 4);
            $stmt->execute();

            if ($ret == 0) {
                $user = User::where("login_id", $id)->first();
                if (!$user) {
                    return response(-2, 200)->header('Content-Type', 'text/plain');
                }
                if ($user->isBanned()) {
                    return response(-4, 200)->header('Content-Type', 'text/plain');
                }
                return response("$session_id|$user_id|$run_ver|$grade|$code", 200)->header('Content-Type', 'text/plain');
            } else {
                return response($ret, 200)->header('Content-Type', 'text/plain');
            }
        }
    }

    public function serverlist($type){
        if (in_array($type, ["php", "asp"])) {
            $serv = null;
            foreach (rohanAuthSettings()->server_list as $server) {
                if ($server["show"]) {
                    $serv .= $server["name"] . "|" . $server["ip"] . "|22102|3|3|1|1|0|0|" . $server["message"] . "|";
                }
            }
            return response($serv, 200)->header('Content-Type', 'text/plain');
        }
    }

    public function loginremove($type){
        if (in_array($type, ["php", "asp"])) {

            $id = request()->input("id");
            $password = request()->input("passwd");
            if ($id == null || $password == null) {
                return response(-1, 200)->header('Content-Type', 'text/plain');
            }
            $password = md5($password);
            $user = User::where("login_id", $id)->first();
            if (!$user) {
                return response(-2, 200)->header('Content-Type', 'text/plain');
            }
            if ($user->isBanned()) {
                return response(-4, 200)->header('Content-Type', 'text/plain');
            }
            if($user->login_pw != $password){
                return response(-1, 200)->header('Content-Type', 'text/plain');
            }
            if($user->login_pw == $password){
                $user->session_id = '';
                $user->save();
                $user->disconnect()->create([
                    "server_id" => 1,
                    "char_id" => 0
                ]);
            }

            return response(0, 200)->header('Content-Type', 'text/plain');
        }
    }
}
