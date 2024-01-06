
@include('public.sections.review.review-script', [
 'type' => 1,
 'url' => Route::current()->uri,
 'post_id' => 0
])
@include('public.sections.comment.comment-script', [
    'type' => 1,
    'url' => Route::current()->uri,
    'post_id' => 0
])
