<!DOCTYPE html>
<html lang="en">
<?
   

?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Sentiment Evaluation</title>
  <style>
    .title {
      text-align: center;
      margin-top: 50px;
    }
    .grid-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      grid-gap: 20px;
      margin-top: 50px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1 class="title">Sentiment Evaluation</h1>
    <h3  class="title"> Highest and lowest sentiment scores</h3>
    <div class="row row-cols-1 row-cols-md-2 mb-3 mt-3 text-center ">
    
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm  border-success">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal">{{$highest['name']}}</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title"><small class="text-body-secondary fw-light"> {{$highest['sentiment']}} / {{$highest['sentiment_score']}}</small></h1>
                    {!! $highest['text'] !!}
            
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm   border-danger">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal">{{$lowest['name']}}</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title"><small class="text-body-secondary fw-light"> {{$lowest['sentiment']}}/ {{$lowest['sentiment_score']}}</small></h1>
                    {!! $lowest['text'] !!}
            
            </div>
            </div>
        </div>

    </div>
    <h3  class="title"> All sentiment scores</h3>
    <div class="row row-cols-1 row-cols-md-3 mt-3 mb-3 text-center">
     @foreach ($products as $product)
        @if($product['sentiment'] == 'positive')
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm  border-success">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal">{{$product['name']}}</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title"><small class="text-body-secondary fw-light"> {{$product['sentiment']}} / {{$product['sentiment_score']}}</small></h1>
                    {!! $product['text'] !!}
            
            </div>
            </div>
        </div>
      @endif

      @if($product['sentiment'] == 'negative')
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm   border-danger">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal">{{$product['name']}}</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title"><small class="text-body-secondary fw-light"> {{$product['sentiment']}}/ {{$product['sentiment_score']}}</small></h1>
                    {!! $product['text'] !!}
            
            </div>
            </div>
        </div>
      @endif

      @if($product['sentiment'] == 'neutral')
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm  border-positive">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal">{{$product['name']}}</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title"><small class="text-body-secondary fw-light"> {{$product['sentiment']}}/ {{$product['sentiment_score']}}</small></h1>
                    {!! $product['text'] !!}
            
            </div>
            </div>
        </div>
      @endif

      @endforeach
    </div>
    
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
