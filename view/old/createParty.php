<?php include 'header.php'; ?>

<form action="?op=createParty" class="form" style="padding: 15px 17px 10px 65px;" method="POST">
    <legend>CREATE NEW PARTY</legend>
    <label>Id: </label><input type="text" name="reserveerbeschikbaarheid_id">
    <label>titel: </label><input type="text" name="titel">
    <label>informatie: </label><input type="text" name="informatie">
    <label>begin tijd: </label><input type="time" id="appt" name="appt"
       min="09:00" max="18:00" name="begin_tijd">
    <label>eind tijd: </label><input type="time" id="appt" name="appt"
       min="09:00" max="18:00" name="eind_tijd">
    <label>zaal: </label><input type="text" name="zaal">
    <label>dag: </label><input type="date" name="dag">
    <button type="submit" name="submit">submit</button>
</form>

<?php include 'footer.php'; ?>