<div class="container one">
    <div class="row">
        <div class="hr1">

        </div>
        <div class="col-sm <?php if($active == "details") {
            echo "active";
        }?>">
            <label>Basic Details</label>
            <div class="circle ">
                <label>1</label>
            </div>
            <div class="hr">
            </div>
        </div>

        <div class="col-sm <?php if($active == "pets") {
            echo "active";
        }?>">
            <label>Pet Details</label>
            <div class="circle">
                <label>2</label>
            </div>
            <div class="hr2">
            </div>
        </div>
        <div class="col-sm <?php if($active == "location") {
            echo "active";
        }?>">
            <label>Location</label>
            <div class="circle">
                <label>3</label>
            </div>
            <div class="hr2">
            </div>
        </div>
        <div class="col-sm <?php if($active == "services") {
            echo "active";
        }?>">
            <label>Services</label>
            <div class="circle">
                <label>4</label>
            </div>
            <div class="hr2">
            </div>
        </div>
        <div class="col-sm <?php if($active == "waiver") {
            echo "active";
        }?>">
            <label>Waiver</label>
            <div class="circle">
                <label>5</label>
            </div>
            <div class="hr2 last">
            </div>
        </div>
    </div>
</div>