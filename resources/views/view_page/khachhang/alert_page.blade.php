<style>
    .top-message {
    background: #e44f3d;
    padding-top: 10px;
    padding-bottom: 10px;
    color: #fff;
    font-weight: 400;
    font-size: 16px;

}

.top-message-content {
    position: relative;
}

.top-message-content .glyphicon {
    margin-right: 7px;
}

.top-message-icon {
    /* padding: 15px; */
    background: #e44f3d;
    color: #fff;
    cursor: pointer;
    position: absolute;
    top: -12px;
    right: 15px;
}
.cut{
    display: none;
}
</style>
@if (session('booked'))
<div id="top-mess" class="top-message">
    <div class="top-message-content container text-center">
        <span class="glyphicon glyphicon-bullhorn"></span>
        <button onclick="cut()" id="top-mess-hide" class="top-message-icon glyphicon glyphicon-chevron-up hidden-xs">&times;</button>
    </div>
</div>
@endif

