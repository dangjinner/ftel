<section class="reviewCommentForPages">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @include('public.sections.review.root-review', [
                    'type' => 1,
                    'url' => Route::current()->uri,
                    'post_id' => 0
                ])
            </div>
            <div class="col-lg-12">
                @include('public.sections.comment.root-comment', [
                    'type' => 1,
                    'url' => Route::current()->uri,
                    'post_id' => 0
                ])
            </div>
        </div>
    </div>
</section>
