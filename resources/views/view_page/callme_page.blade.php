
<style>
.form-1 .date-control {
    color: #fff;
}
.date-control {
    position: absolute;
    top: 0.8125rem;
    left: 1.375rem;
    color: #787976;
    opacity: 1;
    font: 400 0.875rem/1.375rem "Open Sans", sans-serif;
    cursor: text;
    transition: all 0.2s ease;
}
@media screen and (-ms-high-contrast: active),
screen and (-ms-high-contrast: none) {

    .date-control {
        top: 0.9375rem;
    }
}
.form-control-input+.date-control,
.form-control-input.notEmpty+.date-control,
.form-control-textarea+.date-control,
.form-control-textarea.notEmpty+.date-control {
    top: 0.125rem;
    opacity: 1;
    font-size: 0.75rem;
    font-weight: 500;
}
.disappear{
    display: none;
}
</style>

<!-- Call Me -->
<div id="callMe" class="form-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="text-container">
                    <div class="section-title"><h2>Đặt phòng</h2></div>
                    <h4 class="white">Lựa chọn căn phòng bạn muốn nghỉ ngơi, thư giãn...</h4>

                </div>
            </div> <!-- end of col -->
            <div class="col-lg-6">
                <!-- Call Me Form -->
            @if (Auth::guard('loyal_customer')->check())
            <form action="{{url('booking')}}/{{Auth::guard('loyal_customer')->user()->id}}" method="POST" id="callMeForm" data-focus="false" >
                {{ csrf_field() }}
            @endif
                    <div class="form-group">
                        <select class="form-control-select" id="tang" name="tang" required>
                            <option class="select-option" value="" disabled selected>Chọn tầng</option>
                                @foreach ($tang as $value)
                                    <option class="select-option" value="{{ $value->id }}">{{$value->tang}}</option>
                                @endforeach
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <select class="form-control-select" name="phong" id="phong" required>
                            <option class="select-option" value="" disabled selected>Chọn phòng</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="date" onclick="myFunctionDate()" min="" max="" class="form-control-input" id="bookingdate" name="bookingdate" required>
                        <label class="date-control" for="bookingdate">Ngày giờ đặt phòng</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group  disappear" id="disappear">
                        <input type="date" class="form-control-input" onclick="myFunctiondate2()" id="checkout" min="" name="checkout" required>
                        <label class="date-control" for="checkout">Ngày trả phòng</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group checkbox white">
                        <input type="checkbox" id="lterms" value="Agreed-to-Terms" name="lterms" required> <label for="lterms">Tích vào đây đồng nghĩa với những điều bạn điền ở trên là đúng.</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <button  class="form-control-submit-button" type="submit"
                            @if (Auth::guard('loyal_customer')->check())
                            type="submit"
                                @else
                                id="alertbox"
                            @endif

                        >Đặt ngay</button>
                    </div>
                    <div class="form-message">
                        <div id="lmsgSubmit" class="h3 text-center hidden"></div>
                    </div>
                </form>
                <!-- end of call me form -->
    </div>

            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of form-1 -->
<!-- end of call me -->

<script>
    function myFunctionDate() {
        var now = new Date();
        var currentMonthnow = now.getMonth() + 1;
        if (currentMonthnow < 10) {
            currentMonthnow = '0' + currentMonthnow;
        }
        var min = now.getFullYear() + "-" + currentMonthnow + "-" + now.getDate();
        document.getElementById("bookingdate").min = min;
        // var now1 = new Date();
        var now1 = new Date(now.getFullYear(), now.getMonth() + 1);
        var currentMonth = now1.getMonth() + 1;
        if (currentMonth < 10) {
            currentMonth = '0' + currentMonth;
        }
        function getDaysOfMonth(year, month) {

            return new Date(now1.getFullYear(), currentMonth, 0).getDate();

        };
        var max = now1.getFullYear() + "-" + currentMonth + "-" + getDaysOfMonth();
        document.getElementById("bookingdate").max = max;
    document.getElementById("disappear").classList.remove('disappear');

    }
</script>
<script>
    function myFunctiondate2() {
        var checkin = $('#bookingdate').val();
        document.getElementById("checkout").min = checkin;
    }
</script>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Vui chưa đăng nhập để đặt phòng</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
            Đăng nhập <a class="btn btn-warning" style="text-decoration: none;" href="{{url('login')}}">Đăng nhập</a><br><br>
            Hoặc đăng ký <a class="btn btn-warning" style="text-decoration: none;" href="{{url('regis')}}">Đăng ký</a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
