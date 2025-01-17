<template>
    <div class="collapse top-search" id="collapseExample">
        <div class="card card-block">
            <div class="newsletter-widget text-center">
                <form class="form-inline">
                    <input type="text" class="form-control" placeholder="What you are looking for?">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </form>
            </div><!-- end newsletter -->
        </div>
    </div><!-- end top-search -->
</template>

<style>
    form.form-inline .form-control::placeholder {
        color: white !important;
        opacity: 1; /* Ensure full visibility */
    }

    form.form-inline .form-control::-webkit-input-placeholder {
        color: white !important;
    }

    form.form-inline .form-control:-moz-placeholder {
        color: white !important;
    }

    form.form-inline .form-control::-moz-placeholder {
        color: white !important;
    }

    form.form-inline .form-control:-ms-input-placeholder {
        color: white !important;
    }
</style>