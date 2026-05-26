<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xhtml="http://www.w3.org/1999/xhtml">

  <url>
    <loc>{{ url('tr') }}</loc>
    <xhtml:link rel="alternate" hreflang="tr" href="{{ url('tr') }}"/>
    <xhtml:link rel="alternate" hreflang="en" href="{{ url('en') }}"/>
    <changefreq>weekly</changefreq>
    <priority>1.0</priority>
  </url>
  <url>
    <loc>{{ url('en') }}</loc>
    <changefreq>weekly</changefreq>
    <priority>1.0</priority>
  </url>
  <url>
    <loc>{{ url('tr/hakkimizda') }}</loc>
    <changefreq>monthly</changefreq>
    <priority>0.8</priority>
  </url>
  <url>
    <loc>{{ url('en/about') }}</loc>
    <changefreq>monthly</changefreq>
    <priority>0.8</priority>
  </url>
  <url>
    <loc>{{ url('tr/iletisim') }}</loc>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
  </url>
  <url>
    <loc>{{ url('en/contact') }}</loc>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
  </url>

  <url>
    <loc>{{ url('tr/hizmetler') }}</loc>
    <changefreq>weekly</changefreq>
    <priority>0.9</priority>
  </url>
  <url>
    <loc>{{ url('en/services') }}</loc>
    <changefreq>weekly</changefreq>
    <priority>0.9</priority>
  </url>
  @foreach($services as $service)
  <url>
    <loc>{{ url('tr/hizmetler/' . $service->slug) }}</loc>
    <lastmod>{{ $service->updated_at->toAtomString() }}</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.8</priority>
  </url>
  <url>
    <loc>{{ url('en/services/' . $service->slug) }}</loc>
    <lastmod>{{ $service->updated_at->toAtomString() }}</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.8</priority>
  </url>
  @endforeach

  <url>
    <loc>{{ url('tr/projeler') }}</loc>
    <changefreq>weekly</changefreq>
    <priority>0.9</priority>
  </url>
  <url>
    <loc>{{ url('en/projects') }}</loc>
    <changefreq>weekly</changefreq>
    <priority>0.9</priority>
  </url>
  @foreach($projects as $project)
  <url>
    <loc>{{ url('tr/projeler/' . $project->slug) }}</loc>
    <lastmod>{{ $project->updated_at->toAtomString() }}</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
  </url>
  @endforeach

  @foreach($posts as $post)
  <url>
    <loc>{{ url('tr/blog/' . $post->slug) }}</loc>
    <lastmod>{{ $post->updated_at->toAtomString() }}</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.6</priority>
  </url>
  @endforeach

</urlset>
