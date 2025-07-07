@extends('layout.master')
@section('menuHome', 'active')

@section('content')
    <div class="view">
        <div class="container mt-4 mb-5">
            <div class="title">
                <h1 class="text-center">{{ $news->title }}</h1>
            </div>
            <div class="description">
                <h5 class="category text-center"><span class="badge text-bg-dark">{{ $news->category }}</span> by
                    {{ $news->publisher ?? 'admin' }}
                </h5>
                <p class="text-muted text-center">{{ $news->created_at->format('d M Y') }} <strong>-
                        {{ $news->created_at->format('H:i') }}</strong> | {{ $news->jumlah_view }} Views</p>
            </div>
            <div class="image-viewnewss">
                <img src="{{ $news->image ? asset('storage/' . $news->image) : asset('images/noImage.png') }}"
                    class="img-fluid shadow" alt="Powel Image">
            </div>
            <div class="isi mt-3">
                <h2 class="subtitle"> {{ $news->subtitle }} </h2>
                <p class="text-justify">
                    {{ $news->content }}
                </p>
            </div>
            {{-- <div class="title">
                <h1 class="text-center">The Fed is likely to keep rates the same but give a forecast that moves markets. What
                    to
                    expect</h1>
            </div>
            <div class="description">
                <h5 class="category text-center"><span class="badge text-bg-dark">Economy</span> by Jeff Cox</h5>
                <p class="text-muted text-center">Fri, 20/06/2025 <strong>- 10:17</strong></p>
            </div>
            <div class="image-viewnewss">
                <img src="{{ asset('images/powel.webp') }}" class="img-fluid shadow" alt="Powel Image">
            </div>
            <div class="isi mt-3">
                <h2 class="subtitle"> Federal Reserve officials </h2>
                <p class="text-justify">
                    Federal Reserve officials get to voice their outlook this week on the future path of interest rates
                    along
                    with the impact that tariffs and Middle East turmoil will have on the economy.

                    While any immediate movement on interest rates seems improbable, the policy meeting, which concludes
                    Wednesday, will feature important signals that still could move markets.

                    Among the biggest things to watch will be whether Federal Open Market Committee members stick with their
                    previous forecast of two rate cuts this year, how they see inflation trending, and any reaction from
                    Chair
                    Jerome Powell to what has become a concerted White House campaign for easier monetary policy.

                    “The Fed’s main message at the June meeting will be that it remains comfortably in wait-and-see mode,”
                    Bank
                    of America economist Aditya Bhave said in a note. BofA said it expects the Fed won’t cut at all this
                    year
                    but will leave open the possibility for one reduction. “Investors should focus on Powell’s take on the
                    softening labor data, the recent benign inflation prints and the risks of persistent tariff-driven
                    inflation.”

                    The committee’s “dot plot” grid of individual members’ rate expectations will be front and center for
                    investors.

                    At the last update in March, the committee indicated the equivalent of two quarter-percentage-point
                    reductions this year, which is in line with current market pricing. However, that was a close call, and
                    just
                    two participants changing their approach would swing the median forecast down to one cut.

                    The meeting comes against a complicated geopolitical backdrop in which the impact of President Donald
                    Trump’s tariffs on inflation has been minimal so far but is unclear for the future. At the same time,
                    Trump
                    and other administration officials have stepped up their urging of the Fed to lower rates.

                    On top of that, the Israel-Iran conflict threatens to destabilize the global energy picture, providing
                    yet
                    another variable through which to navigate policy.

                    “We expect Chair Powell to repeat his message from the May press conference,” Bhave said. “Policy is in
                    a
                    good place and there is no hurry for the Fed to act.”

                    However, the landscape could change quickly.
                </p>
            </div> --}}
        </div>
    </div>

@endsection
