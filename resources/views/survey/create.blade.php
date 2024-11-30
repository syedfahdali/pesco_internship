@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Submit a Survey</h2>
    
    <form action="{{ route('surveys.store') }}" method="POST">
        @csrf

        <!-- Circle, Division, Sub-Division -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="circle" class="form-label">Circle</label>
                <select id="circle" name="circle" class="form-select" required>
                    <option value="Haripur">Haripur</option>
                     <option value="Peshawar">Peshawar</option>
                     <option value="Manshera">Manshera</option>
                     <option value="Swabi">Swabi</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="division" class="form-label">Division</label>
                <select id="division" name="division" class="form-select" required>
                   <option value="Peshawar">Peshawar</option>
                   <option value="Mardan">Mardan</option>
                   <option value="Malakand">Malakand</option>
                   <option value="Hazara">Hazara</option>
                   <option value="Kohat">Kohat</option>
                   <option value="Bannu">Bannu</option>
                   <option value="Dera Ismail Khan">Dera Ismail Khan</option>
                   <option value="Lakki Marwat">Lakki Marwat</option>
                   <option value="South Waziristan">South Waziristan</option>
                   <option value="North Waziristan">North Waziristan</option>
             </select>

            </div>
            <div class="col-md-4">
                <label for="sub_division" class="form-label">Sub Division</label>
                <select id="sub_division" name="sub_division" class="form-select" required>
                 <option value="Peshawar City">Peshawar City</option>
                 <option value="Charsadda">Charsadda</option>
                 <option value="Mardan City">Mardan City</option>
                <option value="Swabi">Swabi</option>
                <option value="Buner">Buner</option>
                <option value="Abbottabad">Abbottabad</option>
                <option value="Haripur">Haripur</option>
                <option value="Kohat City">Kohat City</option>
                <option value="Bannu City">Bannu City</option>
                <option value="Dera Ismail Khan City">Dera Ismail Khan City</option>
</select>

            </div>
        </div>

        <!-- Grid, Feeder, Distribution System -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="grid" class="form-label">Grid</label>
                <select id="grid" name="grid" class="form-select" required>
                <option value="">Select Grid-station</option>
                <option value="Peshawar Grid">Peshawar Grid</option>
                <option value="Mardan Grid">Mardan Grid</option>
                <option value="Kohat Grid">Kohat Grid</option>
                <option value="Dera Ismail Khan Grid">Dera Ismail Khan Grid</option>
                <option value="Bannu Grid">Bannu Grid</option>
           </select>

            </div>
            <div class="col-md-4">
                <label for="feeder" class="form-label">Feeder</label>
                <select id="feeder" name="feeder" class="form-select" required>
                <option value="">Select Feeder</option>
                <option value="Peshawar Feeder">Peshawar Feeder</option>
                <option value="Mardan Feeder">Mardan Feeder</option>
                <option value="Kohat Feeder">Kohat Feeder</option>
                <option value="Bannu Feeder">Bannu Feeder</option>
                <option value="Dera Feeder">Dera Feeder</option>
                </select>

            </div>
            <div class="col-md-4">
                <label for="distribution_system" class="form-label">Distribution System</label>
                <select id="distribution_system" name="distribution_system" class="form-select" required>
                <option value="">Select a Distribution System</option>
                <option value="Urban Distribution System">Urban Distribution System</option>
                <option value="Rural Distribution System">Rural Distribution System</option>
                <option value="Sub-Urban Distribution System">Sub-Urban Distribution System</option>
                <option value="Industrial Distribution System">Industrial Distribution System</option>
                <option value="Commercial Distribution System">Commercial Distribution System</option>
               </select>

            </div>
        </div>

        <!-- Type of Entry -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="entry_type" class="form-label">Type of Entry</label>
                    <select id="entry_type" name="entry_type" class="form-select" required>
                        <option value="">Select an Entry Type</option>
                        <option value="Single Phase">Single Phase</option>
                        <option value="Three Phase">Three Phase</option>
                        <option value="Commercial">Commercial</option>
                        <option value="Residential">Residential</option>
                        <option value="Industrial">Industrial</option>
                    </select>

            </div>
        </div>

        <!-- HT Line -->
        <h5 class="mb-3">HT Line:</h5>
        <div id="ht-line-section" class="row align-items-center mb-3">
            <div class="col-md-6">
                <label for="conductor_name" class="form-label">Conductor Name</label>
                <select name="ht_lines[0][conductor_name]" class="form-select" required>
                <option value="">Select a Conductor Type</option>
                <option value="AAC (All Aluminum Conductor)">AAC (All Aluminum Conductor)</option>
                <option value="AAAC (All Aluminum Alloy Conductor)">AAAC (All Aluminum Alloy Conductor)</option>
                <option value="ACSR (Aluminum Conductor Steel Reinforced)">ACSR (Aluminum Conductor Steel Reinforced)</option>
                <option value="ACAR (Aluminum Conductor Alloy Reinforced)">ACAR (Aluminum Conductor Alloy Reinforced)</option>
                <option value="Copper Conductor">Copper Conductor</option>
                </select>

            </div>
            <div class="col-md-4">
                <label for="length_in_kms" class="form-label">Length in KMs</label>
                <input type="number" name="ht_lines[0][length_in_kms]" class="form-control" required>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger btn-sm mt-4 remove-ht-line">Remove ×</button>
            </div>
        </div>
        <button type="button" class="btn btn-success mb-4 add-ht-line">Add +</button>

        <!-- Distribution Transformers -->
        <h5 class="mb-3">Distribution Transformers:</h5>
        <div id="transformer-section" class="row align-items-center mb-3">
            <div class="col-md-3">
                <label for="transformer_capacity" class="form-label">Transformer Capacity</label>
                <select name="ht_lines[0][conductor_name]" class="form-select" required>
                <option value="">Select a Conductor Type</option>
                <option value="AAC (All Aluminum Conductor)">AAC (All Aluminum Conductor)</option>
                <option value="AAAC (All Aluminum Alloy Conductor)">AAAC (All Aluminum Alloy Conductor)</option>
                <option value="ACSR (Aluminum Conductor Steel Reinforced)">ACSR (Aluminum Conductor Steel Reinforced)</option>
                <option value="ACAR (Aluminum Conductor Alloy Reinforced)">ACAR (Aluminum Conductor Alloy Reinforced)</option>
                <option value="Copper Conductor">Copper Conductor</option>
                </select>

            </div>
            <div class="col-md-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="transformers[0][quantity]" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="coordinates" class="form-label">Location Coordinates</label>
                <input type="text" name="transformers[0][coordinates]" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="entry_type" class="form-label">Transformer Category</label>
                    <select id="entry_type" name="entry_type" class="form-select" required>
                        <option value="">Select the Category</option>
                        <option value="Single Phase">Single Phase</option>
                        <option value="Three Phase">Three Phase</option>
                        <option value="Commercial">Commercial</option>
                        <option value="Residential">Residential</option>
                        <option value="Industrial">Industrial</option>
                    </select>

            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger btn-sm mt-4 remove-transformer">Remove ×</button>
            </div>
        </div>
        <button type="button" class="btn btn-success mb-4 add-transformer">Add +</button>

        <!-- Connections -->
        <h5 class="mb-3">No. of Connections:</h5>
        <div id="connection-section" class="row align-items-center mb-3">
            <div class="col-md-4">
                <label for="type_of_connection" class="form-label">Type of Connection</label>
                <select name="connections[0][type]" class="form-select" required>
                <option value="">Select Type</option>
                <option value="Overhead">Overhead</option>
                <option value="Underground">Underground</option>
                <option value="Single Phase">Single Phase</option>
                <option value="Three Phase">Three Phase</option>
                <option value="Grounding">Grounding</option>
                </select>

            </div>
            <div class="col-md-4">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="connections[0][quantity]" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="load_kva" class="form-label">Load (KVA)</label>
                <input type="number" name="connections[0][load]" class="form-control" required>
            </div>
        </div>
        <button type="button" class="btn btn-success mb-4 add-connection">Add +</button>

        <!-- No. of Poles Section -->
        <h5 class="mb-3">No. of Poles:</h5>
        <div id="pole-section" class="row align-items-center mb-3">
            <div class="col-md-5">
                <label for="pole_type" class="form-label">Type of Pole</label>
                <select name="poles[0][type]" class="form-select" required>
                    <option value="Steel">Steel</option>
                    <option value="Wooden">Wooden</option>
                </select>
            </div>
            <div class="col-md-5">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="poles[0][quantity]" class="form-control" required>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger btn-sm mt-4 remove-pole">Remove ×</button>
            </div>
        </div>
        <button type="button" class="btn btn-success mb-4 add-pole">Add +</button>

        <!-- Additional Details Section -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="completion_date" class="form-label">Date of Completion of Work</label>
                <input type="date" name="completion_date" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="work_order" class="form-label">Work Order</label>
                <input type="text" name="work_order" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="head" class="form-label">Head</label>
                <input type="text" name="head" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="sanctioned_by" class="form-label">Sanctioned By</label>
                <input type="text" name="sanctioned_by" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="letter_no" class="form-label">Vide Letter No</label>
                <input type="text" name="letter_no" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="survey_date" class="form-label">Date of Survey</label>
                <input type="date" name="survey_date" class="form-control" required>
            </div>
        </div>

        <script>
    let poleIndex = 1;

    document.querySelector('.add-pole').addEventListener('click', function() {
        const poleSection = document.querySelector('#pole-section').cloneNode(true);
        poleSection.querySelectorAll('input, select').forEach(input => {
            input.name = input.name.replace(/\d+/, poleIndex);
            input.value = '';
        });
        document.querySelector('form').insertBefore(poleSection, this);
        poleIndex++;
    });

    document.querySelector('form').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-pole')) {
            e.target.closest('.row').remove();
        }
    });
</script>
        <!-- Footer -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
