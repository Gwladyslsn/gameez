<div id="modal-add-review" class="modal hidden">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3 class="text-black text-center mb-4">Laisser un avis</h3>

        <form id="form-review">
            <div class="mb-4">
                <label for="rating" class="text-lg text-black">Votre note :</label>
                <div class="rating" id="rating-trip">
                    <input type="radio" name="review_note" id="star5" value="5" aria-label="5 étoiles">
                    <label for="star5"></label>

                    <input type="radio" name="review_note" id="star4" value="4" aria-label="4 étoiles">
                    <label for="star4"></label>

                    <input type="radio" name="review_note" id="star3" value="3" aria-label="3 étoiles">
                    <label for="star3"></label>

                    <input type="radio" name="review_note" id="star2" value="2" aria-label="2 étoiles">
                    <label for="star2"></label>

                    <input type="radio" name="review_note" id="star1" value="1" aria-label="1 étoile">
                    <label for="star1"></label>
                </div>
            </div>

            <div class="mb-4">
                <label for="message" class="text-black">Votre message :</label>
                <textarea id="comment-review" name="review_comment" rows="4" required></textarea>
            </div>
            <button id="validate-add-review">Valider</button>
        </form>

        
    </div>
</div>