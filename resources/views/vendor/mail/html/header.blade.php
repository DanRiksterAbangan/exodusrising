@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<strong>Global Rohan 2</strong>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
