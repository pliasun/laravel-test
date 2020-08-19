require('./components/datatables.min')
require('./components/dataTables.bootstrap4.min')
require('./bootstrap')
require('./components/main')
require('./components/column-cherts')
require('toastr')
require('metismenu')
require('select2')
import swal from 'sweetalert'

var sideMenu = $('#side-menu').metisMenu({
    subMenu: '.nav.nav-second-level'
})

sideMenu.on('show.metisMenu', function (e) {})

$('.select-custom').select2({
    minimumResultsForSearch: Infinity
})

$('.delete-alert').on('click', function (event) {
    event.preventDefault()
    let $this = $(this)
    const url = $this.data('action')
    swal({
        title: $this.data('title'),
        text: $this.data('text'),
        icon: 'warning',
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    data: {
                        _method: 'DELETE'
                    },
                    dataType: 'JSON',
                    url: url,
                    success: function (response) {
                        if (response.success){
                            swal($this.data('success'), {
                                icon: 'success',
                            })
                            setTimeout(() => {
                            window.location.reload()
                        }, 1000)
                        }else{
                            console.log(response)
                            swal($this.data('error-title'), $this.data('error'), 'error')
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText) // this line will save you tons of hours while debugging
                        // do something here because of error
                    }
                })
            } else {
                swal($this.data('error-title'), $this.data('error'), 'error')
            }
        })
})
