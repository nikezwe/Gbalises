<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('balise.show', ['slug' => $balise->getSlug(), 'balise' => $balise]) }}">{{ $balise->nom }}</a>
        </h5>
        <div class="text-primary fw-bold" style="font-size:1.4rem">
            {{ number_format($balise->prix, 0, '.', ' ') }}£
        </div>
    </div>
</div>