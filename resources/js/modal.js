document.querySelectorAll('.btn-open-modal').forEach(btn => {
        btn.addEventListener('click', function () {
    
            const id = this.dataset.id;
    
            if (id != null) {
                
                document.getElementById('modal-description').value = this.dataset.description;
                document.getElementById('modal-status').value = this.dataset.status;
                document.getElementById('modal-quiz-id').value = this.dataset.quiz_id;
    
                document.getElementById('formEditQuestion').action = "/admin/questions/update/" + id;
    
                document.getElementById('modal').classList.remove('hidden');
            }
        });
    });
