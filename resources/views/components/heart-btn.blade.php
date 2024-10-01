@props(['productId', 'isWished' => false])

<form action="{{ route('wishlist.toggle', $productId) }}" method="POST" id="wishlist-form-{{ $productId }}">
    @csrf <!-- CSRF token is needed for POST requests -->
    <button class="wishlist wl" type="button" onclick="toggleWish('{{ $productId }}', {{ $isWished ? 'true' : 'false' }})">
        <div id="heart-empty-{{ $productId }}" class="{{ $isWished ? 'hidden' : '' }}">
            <svg width="34" height="31" viewBox="0 0 34 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.4998 25.9167L17.3332 26.0833L17.1498 25.9167C9.23317 18.7333 3.99984 13.9833 3.99984 9.16667C3.99984 5.83333 6.49984 3.33333 9.83317 3.33333C12.3998 3.33333 14.8998 5 15.7832 7.26667H18.8832C19.7665 5 22.2665 3.33333 24.8332 3.33333C28.1665 3.33333 30.6665 5.83333 30.6665 9.16667C30.6665 13.9833 25.4332 18.7333 17.4998 25.9167ZM24.8332 0C21.9332 0 19.1498 1.35 17.3332 3.46667C15.5165 1.35 12.7332 0 9.83317 0C4.69984 0 0.666504 4.01667 0.666504 9.16667C0.666504 15.45 6.33317 20.6 14.9165 28.3833L17.3332 30.5833L19.7498 28.3833C28.3332 20.6 33.9998 15.45 33.9998 9.16667C33.9998 4.01667 29.9665 0 24.8332 0Z" fill="#4C4343"/>
            </svg>
        </div>
        <div id="heart-filled-{{ $productId }}" class="{{ $isWished ? '' : 'hidden' }}">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_160_938)">
                    <path d="M20.1667 30.9167L20 31.0833L19.8167 30.9167C11.9 23.7333 6.66666 18.9833 6.66666 14.1667C6.66666 10.8333 9.16666 8.33333 12.5 8.33333C15.0667 8.33333 17.5667 10 18.45 12.2667H21.55C22.4333 10 24.9333 8.33333 27.5 8.33333C30.8333 8.33333 33.3333 10.8333 33.3333 14.1667C33.3333 18.9833 28.1 23.7333 20.1667 30.9167ZM27.5 5C24.6 5 21.8167 6.35 20 8.46667C18.1833 6.35 15.4 5 12.5 5C7.36666 5 3.33333 9.01667 3.33333 14.1667C3.33333 20.45 8.99999 25.6 17.5833 33.3833L20 35.5833L22.4167 33.3833C31 25.6 36.6667 20.45 36.6667 14.1667C36.6667 9.01667 32.6333 5 27.5 5Z" fill="#4C4343"/>
                    <path d="M20 35.5833L17.5833 33.3833C8.99999 25.6 3.33333 20.45 3.33333 14.1667C3.33333 9.01667 7.36666 5 12.5 5C15.4 5 18.1833 6.35 20 8.46667C21.8167 6.35 24.6 5 27.5 5C32.6333 5 36.6667 9.01667 36.6667 14.1667C36.6667 20.45 31 25.6 22.4167 33.3833L20 35.5833Z" fill="#4C4343"/>
                </g>
                <defs>
                    <clipPath id="clip0_160_938">
                        <rect width="40" height="40" fill="white"/>
                    </clipPath>
                </defs>
            </svg>
        </div>
    </button>
</form>

<script>
function toggleWish(productId, currentWishedState) {
    const form = document.getElementById(`wishlist-form-${productId}`);
    const heartEmpty = document.getElementById(`heart-empty-${productId}`);
    const heartFilled = document.getElementById(`heart-filled-${productId}`);

    // Flip the wish state
    const newWishedState = !currentWishedState;

    // Toggle the visibility of the hearts
    heartEmpty.classList.toggle('hidden', newWishedState);
    heartFilled.classList.toggle('hidden', !newWishedState);

    // Create a new hidden input to send the new state to the server
    const hiddenInput = document.createElement('input');
    hiddenInput.type = 'hidden';
    hiddenInput.name = 'is_wished'; // Name your input appropriately
    hiddenInput.value = newWishedState ? 'true' : 'false'; // Flip the wish status

    // Remove any existing hidden input
    const existingInput = form.querySelector('input[name="is_wished"]');
    if (existingInput) {
        form.removeChild(existingInput);
    }

    // Append the hidden input to the form
    form.appendChild(hiddenInput);

    // Submit the form to toggle the wishlist state on the server
    form.submit();
}
</script>
