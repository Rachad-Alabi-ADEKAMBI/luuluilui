@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
            <img src="/public/img/logonoir.png" class="logo" alt="Laravel Logo">
            <img src="/public/img/logoblanc.png" class="logo" alt="Laravel Logo">
            @else

            @else
            {{ $slot }}
            @endif
        </a>
    </td>
</tr>