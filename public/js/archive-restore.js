jQuery( function ( $ ) {
    $( '.btn.archive' ).on( 'click', function ( e ) {
        e.preventDefault();

        var name = $( this ).closest( '.record' ).find( '.name' ).text(),
            type = $( this ).closest( '.record' ).data( 'type' ),
            link = $( this ).attr( 'href' ),
            message;

        type === 'restore' ? message = 'Restore' : message = 'Archive';

        BootstrapDialog.confirm( {
            title: message + ' student ' + name,
            message: 'Are you sure you want to ' + type +' student ' + name + '?',
            type: BootstrapDialog.TYPE_DANGER,
            closable: true,
            btnOKLabel: message,
            callback: function ( result ) {
                if ( result ) {
                    type === 'restore' ? document.getElementById('restore-student').submit() : location.href = link;
                }
            }
        } );
    } );
} );
