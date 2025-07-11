<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $page->title }}</title>
  <meta name="description" content="{{ $page->meta_description }}">
  <link rel="stylesheet" href="{{ url('css/native/page.css') }}">
</head>

<body>

  <!-- Hero -->
  <section class="hero">
    <div class="overlay"></div>
    <div class="hero-content">
      <h1 id="quote"></h1>
    </div>
    <div class="sakura" style="left:10%;animation-delay:0s;"></div>
    <div class="sakura" style="left:25%;animation-delay:2s;"></div>
    <div class="sakura" style="left:40%;animation-delay:4s;"></div>
    <div class="sakura" style="left:60%;animation-delay:1s;"></div>
    <div class="sakura" style="left:80%;animation-delay:3s;"></div>
    <div class="screen-effect" id="screen-effect"></div>
  </section>

  @foreach ($page->sections as $section)
    <section @if ($section->background) style="background-color:{{ $section->background }};" @endif>
      @foreach ($section->blocks as $block)
        @php $data = (object) $block->data; @endphp

        @if ($block->type === 'header')
          <h2>{{ $data->title }}</h2>
          <p class="lead">{{ $data->desc }}</p>
        @elseif ($block->type === 'text')
          <p class="text">{{ $data->text }}</p>
        @elseif ($block->type === 'gallery')
          <div class="screenshot-container">
            @foreach ($data->images as $img)
              <div class="screenshot"><img src="{{ $img }}" alt=""></div>
            @endforeach
          </div>
        @elseif ($block->type === 'button')
          <div class="cta-button-container">
            @foreach ($data as $btn)
              <a class="cta-button" href="{{ $btn['url'] ?? '#' }}">{{ $btn['text'] }}</a>
            @endforeach
          </div>
        @elseif ($block->type === 'social')
          <div class="social-card-container">
            @foreach ($data as $social)
              <a class="social-card" href="{{ $social['url'] }}" target="_blank">
                <img src="{{ $social['icon'] }}" alt="Logo {{ $social['name'] }}">
                <span>{{ $social['name'] }}</span>
              </a>
            @endforeach
          </div>
        @elseif ($block->type === 'profile')
          <div class="profile-container">
            @foreach ($data as $profile)
              <div class="profile">
                <img src="{{ $profile['image'] }}" alt="Profil {{ $profile['name'] }}">
                <h3 class="name">{{ $profile['name'] }}</h3>
                <p class="quote">"{{ $profile['quote'] }}"</p>
              </div>
            @endforeach
          </div>
        @endif
      @endforeach
    </section>
  @endforeach

  <footer style="margin-top:60px;text-align:center;">
    &copy; {{ now()->year }} Mojomu Games • Email:
    <a href="mailto:support@mojomu.com" style="color:#ddd;">support@mojomu.com</a>
  </footer>

  <script>const WS_URL = "{{ env('WS_URL') }}";</script>
  <script src="{{ url('js/native/page.js') }}"></script>

</body>
</html>
