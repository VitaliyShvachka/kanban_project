<style>
 .right-section {
  float: left;
  width: 80%;
  margin-left: 10px;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
 }
 .column {
  width: 30%;
  padding: 10px;
  background-color: #f2f2f2;
  margin-bottom: 10px;
 }
</style>


<section class="right-section">
 @foreach($statuses as $status)
 <div class="column">{{$status->name}}</div>
 @endforeach
</section>

