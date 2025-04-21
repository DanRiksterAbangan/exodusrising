<?php
use App\Settings\GeneralSettings;
use App\Settings\RohanAuthSettings;


function settings(){
    $settings = app(GeneralSettings::class);
    return $settings;
}

function rohanAuthSettings(){
    $settings = app(RohanAuthSettings::class);
    return $settings;
}




function characterClasses(){
    return array(
        196869=>array(196870,196871), # HUMAN_NEWBIE_WOMAN
        196993=>array(196994,196995), # HUMAN_NEWBIE_MAN

        197133=>array(197134,197135), # ELF_NEWBIE_WOMAN
        197257=>array(197258,197259), # ELF_NEWBIE_MAN

        197653=>array(197654,197655), # HALFELF_NEWBIE_WOMAN
        197777=>array(197778,197779), # HALFELF_NEWBIE_MAN

        198685=>array(198686,198687), # DAN_NEWBIE_WOMAN
        198809=>array(198810,198811), # DAN_NEWBIE_MAN

        200741=>array(200742,200743), # GIANT_NEWBIE_WOMAN
        200865=>array(200866,200867), # GIANT_NEWBIE_MAN

        204845=>array(204846,204847), # DARKELF_NEWBIE_WOMAN
        204969=>array(204970,204971), # DARKELF_NEWBIE_MAN

        229437=>array(229438,229439), # DEKAN_NEWBIE_WOMAN
        229561=>array(229562,229563), # DEKAN_NEWBIE_MAN
      );

}


function characterClassNames(){
    return array(
        196869=>'Human',	196870=>'Guardian',	196871=>'Defender',
        196993=>'Human',	196994=>'Guardian',	196995=>'Defender',

        197133=>'Elf',	197134=>'Priest',	197135=>'Templar',
        197257=>'Elf',	197258=>'Priest',	197259=>'Templar',

        197653=>'Archer',	197654=>'Ranger',	197655=>'Scout',
        197777=>'Archer',	197778=>'Ranger',	197779=>'Scout',

        198685=>'Assasin',	198686=>'Avenger',	198687=>'Predator',
        198809=>'Assasin',	198810=>'Avenger',	198811=>'Predator',

        200741=>'Warrior',	200742=>'Berseker',	200743=>'Savage',
        200865=>'Warrior',	200866=>'Berseker',	200867=>'Savage',

        204845=>'Mage',	204846=>'Warlock',	204847=>'Wizard',
        204969=>'Mage',	204970=>'Warlock',	204971=>'Wizard',

        229437=>'Dragon Fighter',	229438=>'Dragon Knight',	229439=>'Dragon Sage',
        229561=>'Dragon Fighter',	229562=>'Dragon Knight',	229563=>'Dragon Sage',

        );

}
