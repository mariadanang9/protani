@props(['id', 'title', 'message', 'confirmText' => 'Ya, Lanjutkan', 'cancelText' => 'Batal'])

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center py-4">
                <div class="confirm-icon mb-3">⚠️</div>
                <p class="mb-0">{{ $message }}</p>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ $cancelText }}</button>
                <button type="button" class="btn btn-danger" id="{{ $id }}-confirm">{{ $confirmText }}</button>
            </div>
        </div>
    </div>
</div>

<style>
    .confirm-icon {
        font-size: 4rem;
        animation: shake 0.5s ease;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-10px); }
        75% { transform: translateX(10px); }
    }
</style>
