function toggleLike(button) {
    const likeCount = button.querySelector('.like-count');
    let count = parseInt(likeCount.textContent);

    if (button.classList.contains('liked')) {
        button.classList.remove('liked');
        likeCount.textContent = count - 1;
    } else {
        button.classList.add('liked');
        likeCount.textContent = count + 1;

        // Animation du like
        button.style.animation = 'none';
        button.offsetHeight; // Trigger reflow
        button.style.animation = 'pulse 0.6s ease';
    }
}

function toggleComments(button) {
    const post = button.closest('.post');
    const commentsSection = post.querySelector('.comments-section');

    if (commentsSection.classList.contains('active')) {
        commentsSection.classList.remove('active');
        button.style.background = 'transparent';
    } else {
        commentsSection.classList.add('active');
        button.style.background = 'rgba(102, 126, 234, 0.1)';
    }
}

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Gestion de la création de posts
document.querySelector('.create-post-form').addEventListener('submit', async function (e) {
    e.preventDefault();
    const title = this.querySelector('input').value;
    const content = this.querySelector('textarea').value;

    if (title && content) {
        try {
            const formData = new FormData();
            formData.append('title', title);
            formData.append('content', content);

            const response = await fetch('/createPost', {
                method: 'POST',
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
                body: formData
            });

            const data = await response.json();

            // Insérer le post renvoyé par PHP
            createNewPost(data.title, data.content, data.username, data.created_at);

            this.reset();
        } catch (error) {
            console.error("Erreur AJAX :", error);
        }
    }
});


function createNewPost(title, content, username, createdAt) {
    const postsContainer = document.querySelector('.posts-container');
    const newPost = document.createElement('div');
    newPost.className = 'post fade-in';

    newPost.innerHTML = `
        <div class="post-header">
            <div class="user-avatar">${username.substring(0,2).toUpperCase()}</div>
            <div class="post-info">
                <div class="username">${username}</div>
                <div class="post-time">${createdAt}</div>
            </div>
        </div>
        <div class="post-content">
            <div class="post-title">${title}</div>
            <div class="post-text">${content}</div>
        </div>
        <div class="post-actions">
            <button class="action-btn like-btn" onclick="toggleLike(this)">
                <span>❤️</span>
                <span class="like-count">0</span>
            </button>
            <button class="action-btn comment-btn" onclick="toggleComments(this)">
                <span>💬</span>
                <span>0 commentaire</span>
            </button>
        </div>
        <div class="comments-section">
            <div class="add-comment">
                <input type="text" class="comment-input" placeholder="Ajoutez votre commentaire...">
                <button class="comment-submit">Envoyer</button>
            </div>
        </div>
    `;

    postsContainer.insertBefore(newPost, postsContainer.firstChild);
    newPost.scrollIntoView({ behavior: 'smooth', block: 'center' });
}


// Gestion des commentaires
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('comment-submit')) {
        const input = e.target.previousElementSibling;
        const commentText = input.value.trim();

        if (commentText) {
            addComment(e.target, commentText);
            input.value = '';
        }
    }
});

function addComment(button, text) {
    const commentsSection = button.closest('.comments-section');
    const addCommentDiv = button.closest('.add-comment');

    const newComment = document.createElement('div');
    newComment.className = 'comment fade-in';
    newComment.innerHTML = `
                <div class="comment-header">
                    <div class="comment-avatar">VO</div>
                    <div class="comment-username">Vous</div>
                    <div class="comment-time">À l'instant</div>
                </div>
                <div class="comment-text">${text}</div>
            `;

    commentsSection.insertBefore(newComment, addCommentDiv);

    // Mettre à jour le compteur de commentaires
    const post = commentsSection.closest('.post');
    const commentBtn = post.querySelector('.comment-btn span:last-child');
    const currentCount = parseInt(commentBtn.textContent.split(' ')[0]) || 0;
    commentBtn.textContent = `${currentCount + 1} commentaire${currentCount + 1 > 1 ? 's' : ''}`;
}

// Animation de pulsation pour les likes
const style = document.createElement('style');
style.textContent = `
            @keyframes pulse {
                0% { transform: scale(1); }
                50% { transform: scale(1.2); }
                100% { transform: scale(1); }
            }
        `;
document.head.appendChild(style);

// Masquer le bouton de retour en haut quand on est en haut de page
window.addEventListener('scroll', function () {
    const floatingAction = document.querySelector('.floating-action');
    if (window.scrollY > 200) {
        floatingAction.style.opacity = '1';
        floatingAction.style.transform = 'scale(1)';
    } else {
        floatingAction.style.opacity = '0.7';
        floatingAction.style.transform = 'scale(0.8)';
    }
});