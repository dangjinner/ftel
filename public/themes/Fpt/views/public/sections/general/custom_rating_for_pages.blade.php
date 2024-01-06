@push('schemaJson')
    @if($category_services->avg_rating > 0 && $category_services->rating_count > 0)
        <script type="application/ld+json">
          {
            "@context": "https://schema.org/",
            "@type": "CreativeWorkSeries",
            "name": "{{ $category_services->name }}",
            "aggregateRating": {
              "@type": "AggregateRating",
              "ratingValue": "{{ $category_services->avg_rating }}",
              "bestRating": "5",
              "ratingCount": "{{ $category_services->rating_count }}"
            }
          }
        </script>
    @endif

@endpush
