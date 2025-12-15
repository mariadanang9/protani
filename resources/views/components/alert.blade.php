@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show alert-animated" role="alert">
        <div class="d-flex align-items-center">
            <div class="alert-icon me-3">✅</div>
            <div class="flex-grow-1">
                <strong>Berhasil!</strong> {{ session('success') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show alert-animated" role="alert">
        <div class="d-flex align-items-center">
            <div class="alert-icon me-3">❌</div>
            <div class="flex-grow-1">
                <strong>Error!</strong> {{ session('error') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
@endif

@if(session('info'))
    <div class="alert alert-info alert-dismissible fade show alert-animated" role="alert">
        <div class="d-flex align-items-center">
            <div class="alert-icon me-3">ℹ️</div>
            <div class="flex-grow-1">
                <strong>Info:</strong> {{ session('info') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-warning alert-dismissible fade show alert-animated" role="alert">
        <div class="d-flex align-items-center">
            <div class="alert-icon me-3">⚠️</div>
            <div class="flex-grow-1">
                <strong>Peringatan!</strong> {{ session('warning') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
@endif

<style>
    .alert-animated {
        animation: slideDown 0.5s ease;
    }

    .alert-icon {
        font-size: 1.5rem;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Auto dismiss after 5 seconds */
    .alert {
        animation: slideDown 0.5s ease, fadeOut 0.5s ease 4.5s forwards;
    }

    @keyframes fadeOut {
        to {
            opacity: 0;
            transform: translateY(-20px);
        }
    }
</style>

<script>
    // Auto dismiss alerts after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            setTimeout(() => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }, 5000);
        });
    });
</script>
