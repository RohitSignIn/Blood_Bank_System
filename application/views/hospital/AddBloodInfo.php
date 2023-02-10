<form id="bloodInfo_form" class="container mt-4">
<h3 class="mb-3">Add Blood Unit Available</h3>
    <div class="row mb-3">
        <div class="input-group col">
            <span class="input-group-text" id="o_positive">O Positive</span>
            <input type="number" class="form-control" value=<?= $blood_avlbl[0]['o_pve'] ?> required name="o_positive">
        </div>
        <div class="input-group col">
            <span class="input-group-text" id="o_negative">O Negative</span>
            <input type="number" class="form-control" value=<?= $blood_avlbl[0]['o_nve'] ?> required name="o_negative">
        </div>
    </div>
    <div class="row mb-3">
        <div class="input-group col">
            <span class="input-group-text" id="a_positive">A Positive</span>
            <input type="number" class="form-control" value=<?= $blood_avlbl[0]['a_pve'] ?> required name="a_positive">
        </div>
        <div class="input-group col">
            <span class="input-group-text" id="a_negative">A Negative</span>
            <input type="number" class="form-control" value=<?= $blood_avlbl[0]['a_nve'] ?> required name="a_negative">
        </div>
    </div>
    <div class="row mb-3">
        <div class="input-group col">
            <span class="input-group-text" id="b_positive">B Positive</span>
            <input type="number" class="form-control" value=<?= $blood_avlbl[0]['b_pve'] ?> required name="b_positive">
        </div>
        <div class="input-group col">
            <span class="input-group-text" id="b_negative">B Negative</span>
            <input type="number" class="form-control" value=<?= $blood_avlbl[0]['b_nve'] ?> required name="b_negative">
        </div>
    </div>
    <div class="row mb-3">
        <div class="input-group col">
            <span class="input-group-text" id="ab_positive">AB Positive</span>
            <input type="number" class="form-control" value=<?= $blood_avlbl[0]['ab_pve'] ?> required name="ab_positive">
        </div>
        <div class="input-group col">
            <span class="input-group-text" id="ab_negative">AB Negative</span>
            <input type="number" class="form-control" value=<?= $blood_avlbl[0]['ab_nve'] ?> required name="ab_negative">
        </div>
    </div>
    
            <button type="submit" class="btn btn-danger mt-4">Submit</button>
        </form>