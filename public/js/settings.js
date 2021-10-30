$(function () {
    if (Cookies.get('presence') != 'Present')
    {
        Cookies.set('presence', 'Absent', {expires: 1 } )
    } else {
        $('#checkInBtn').prop('disabled', true)
    }

    $('#presenceLabel').html(Cookies.get('presence'))

    $('#checkInBtn').click( function (e) {
        e.preventDefault();

        Cookies.set('presence', 'Present', { expires: 1 })

        location.reload()
    })
});