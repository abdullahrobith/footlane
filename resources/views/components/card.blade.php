<?php
$img = ['https://www.aromasyrecuerdos.com/wp-content/uploads/2023/02/scandal-min.jpg',
        'https://cdn.idntimes.com/content-images/post/20240621/mykonos-california-cb27665af21642304bc0cd1bec85ead4.jpg',
        'https://perfumeonline.ca/cdn/shop/files/Ysl-Y-Intense_1024x1024.png?v=1689019128'
 ];

$name = [
    'Scandal',
    'MyKonos-California',
    'YSL Y'
];
$jumlah = count($img)
?>
<div class="container">
    <div class="row">
        <?php for ($i = 0; $i < $jumlah; $i++): ?>
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{ $img[$i] }}" class="card-img-top" alt="{{$name[$i]}}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $name[$i] }}</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                        
                    </div>
                </div>
                <x-alert></x-alert>
            </div>
        <?php endfor; ?>
    </div>
</div>

