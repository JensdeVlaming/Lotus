const profileModal = document.getElementById("profile-modal");
const form = document.getElementById("profileForm");

window.addEventListener('load', loadModal);

function loadModal() {
    document.querySelectorAll("profileModal").modal('show')
};

$(window).on('load',function(){
    $('#myModal').modal('show');
});