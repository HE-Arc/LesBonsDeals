function confirmDialog(element) {
    swal({
        title: 'Êtes-vous sûr ?',
        text: "Cette action supprimera votre annonce de façon irréversible",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui',
        cancelButtonText: 'Non',
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false,
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            swal(
                'Supprimé !',
                'Votre annonce a été supprimée',
                'success'
            );

            let id = element.id;
            $("#delete_form").attr("action", "/article/" + id);
            $("#delete_form").submit();
            return true;
        } else if (result.dismiss === 'cancel') {
            swal(
                'Annulé !',
                'Votre annonce est toujours répertorié',
                'error'
            );
            return false;
        }
    });
}