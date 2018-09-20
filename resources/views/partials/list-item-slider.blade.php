@php
$image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
$w     = $image[1];
$h     = $image[2];
$class =  ($h / $w) > 0.5 ? 'portrait' : '';
$featured_image = get_the_post_thumbnail(get_the_id(), 'medium', array('class' => $class));
@endphp

<article>
    <div class="img-circle">
        @if(has_post_thumbnail())
            {!! $featured_image !!}
        @endif()
    </div>
    <h2>{{ get_the_title() }} </h2>
</article>
