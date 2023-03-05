<style>
  .mieuta {
    font-family: arial;
    width: 73rem;
    margin-left: 185px;
    padding-bottom: 3em;
    margin-bottom: 30px;
  }
  h3 {
    color: black;
  }
  .tab {
    overflow: hidden;
  }
  .tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
  }
  .tab button:hover {
    background-color: #ddd;
  }
  .tab button.active {
    background-color: white;
    border-bottom: 2px solid #ca0808;
  }
  .tabcontent {
    display: none;
    padding: 12px 0px;
    border-top: none;
  }
  .tabcontent p {
    font-size: 15px;
    line-height: 1.8;
  }
  .in4{
    display: flex;
    padding: 0px 20px;
    border: 1px dotted rgba(0,0,0,.1);
    font-size: 14px;
  }
</style>
  <div class="mieuta">
    <div class="tab">
      <button class="tablinks" onclick="openCity(event, 'description')">Description</button>
      <button class="tablinks" onclick="openCity(event, 'in4mation')">Additional information</button>
      <button class="tablinks" onclick="openCity(event, 'reviews')">Reviews</button>
    </div>
    <div id="description" class="tabcontent">
      <h3 style="margin-bottom: 30px;">Description</h3>
      <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur.</p>
    </div>
    <div id="in4mation" class="tabcontent">
      <h3 style="margin-bottom: 30px;">Additional information</h3>
      <div class="in4">
        <b style="padding: 0px 60px 0px 40px;">Dough</b>
        <i>American style, Italian style</i>
      </div>
      <div class="in4">
        <b style="padding: 0px 80px 0px 40px;">Size</b>
        <i>Large, Medium, Small</i>
      </div>
    </div>
    <div id="reviews" class="tabcontent">
      <h3 style="margin-bottom: 30px;">Reviews</h3>
      <p>Phần còn lại của reviews sẽ làm tiếp</p>
    </div>
  </div>
  <script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) 
        tabcontent[i].style.display = "none";
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) 
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
  </script>