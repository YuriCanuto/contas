import axios from "axios";
import Swal from 'sweetalert2'

const deleteURL = document.getElementById('btnDeletar');

if (deleteURL) {
    deleteURL.addEventListener('click', function (e) {
        const url = e.currentTarget.getAttribute('url')
        const urlCallback = e.currentTarget.getAttribute('urlCallback')

        Swal.fire({
            title: "Você quer realmente deseja deletar?",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sim, quero deletar",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                axios.delete(url)
                    .then(response => {
                        console.log(response)
                        if (response.status == 204) {
                            if (urlCallback) {
                                window.location.href = urlCallback
                            }
                        }
                    })
                    .catch(err => {
                        console.log(err);
                    })
            }
        });
    })
}