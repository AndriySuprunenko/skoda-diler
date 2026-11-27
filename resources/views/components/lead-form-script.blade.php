{{-- Shared submit handler for all lead forms (x-form, x-modal, x-service-form). --}}
<script>
    window.submitLeadForm = function(form, state) {
        if (state.isSubmitting) return;

        // Read the fields before isSubmitting disables them (disabled inputs are left out of FormData).
        const formData = new FormData(form);
        state.isSubmitting = true;

        fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': formData.get('_token')
                }
            })
            .then(async (response) => {
                const data = await response.json().catch(() => ({}));
                if (!response.ok) throw {
                    status: response.status,
                    data
                };
                window.location.href = data.redirect || '/thank-you';
            })
            .catch((err) => {
                state.isSubmitting = false;
                const fieldErrors = err?.data?.errors || {};
                const errors = {};
                if (fieldErrors.name) errors.name = 'Це поле є обовʼязковим';
                if (fieldErrors.phone) errors.phone = 'Невірний формат номера';
                if (!errors.name && !errors.phone) {
                    errors.general = err?.status === 429 ?
                        'Забагато спроб. Спробуйте за хвилину.' :
                        (err?.status === 419 ?
                            'Сесія застаріла. Оновіть сторінку та спробуйте ще раз.' :
                            'Не вдалося відправити заявку. Спробуйте ще раз або зателефонуйте нам.');
                }
                state.errors = errors;
            });
    };
</script>
