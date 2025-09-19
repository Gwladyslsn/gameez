function showTab(tabName) {
    // Hide all tab contents
    const tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(content => {
        content.classList.remove('active');
    });

    // Remove active class from all tab buttons
    const tabButtons = document.querySelectorAll('.tab-button');
    tabButtons.forEach(button => {
        button.classList.remove('active');
    });

    // Show selected tab content
    document.getElementById(tabName).classList.add('active');

    // Add active class to clicked tab button
    event.target.classList.add('active');
}

// Add some interactivity
document.addEventListener('DOMContentLoaded', function () {

    // Review actions
    const approveButtons = document.querySelectorAll('.btn-approve');
    approveButtons.forEach(button => {
        button.addEventListener('click', function () {
            if (confirm('Approuver cet avis ?')) {
                this.closest('.review-card').style.opacity = '0.5';
                console.log('Avis approuvé');
                // Here you would implement actual approval logic
            }
        });
    });

    const rejectButtons = document.querySelectorAll('.btn-reject');
    rejectButtons.forEach(button => {
        button.addEventListener('click', function () {
            if (confirm('Rejeter cet avis ?')) {
                this.closest('.review-card').style.opacity = '0.5';
                console.log('Avis rejeté');
                // Here you would implement actual rejection logic
            }
        });
    });

    // Game actions
    const editButtons = document.querySelectorAll('.btn-edit');
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            console.log('Éditer le jeu');
            // Here you would redirect to edit page or open modal
        });
    });

    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            if (confirm('Supprimer ce jeu ?')) {
                console.log('Jeu supprimé');
                // Here you would implement actual deletion logic
            }
        });
    });


    

});