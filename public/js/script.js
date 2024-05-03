const btnOpens = document.querySelectorAll("#btnOpen");
const btnCloses = document.querySelectorAll("#btnClose");
const modals = document.querySelectorAll("dialog");

btnOpens.forEach(function(btnOpen, index) {
    btnOpen.addEventListener("click", function() {
        modals[index].showModal();
    });
});

btnCloses.forEach(function(btnClose) {
    btnClose.addEventListener("click", function() {
        const modal = this.closest('dialog');
        modal.close();
    });
});
