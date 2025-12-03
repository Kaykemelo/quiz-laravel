document.querySelectorAll('.btn-modal').forEach(btn => {
    btn.addEventListener('click', function () {

        const id = this.dataset.id;

        if (id != null ) {
            
            document.getElementById('alternative-modal').value = this.dataset.description;
            document.getElementById('question_id-modal').value = this.dataset.question_id;
            document.getElementById('correct-modal').value = this.dataset.correct;

            document.getElementById('formEditAlternative').action = "/admin/alternatives/update/" + id;

            document.getElementById('modal-alternatives').classList.remove('hidden');
        }
    });
});