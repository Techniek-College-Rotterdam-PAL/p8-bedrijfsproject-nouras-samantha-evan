@extends('components.layout')


<form action="{{ route('phoneRepair.submit') }}" method="POST">
    @csrf
    <h3>Telefoon Reparatie Verzoek</h3>

    <label for="device">Apparaat:</label>
    <select name="device" id="device">
        <option value="iphone">iPhone</option>
        <option value="samsung">Samsung</option>
        <!-- Exclude Chinese brands -->
        <option value="nokia">Nokia</option>
    </select>

    <label for="issue">Probleem Beschrijving:</label>
    <textarea name="issue" id="issue" required></textarea>

    <label for="email">Uw E-mail (optioneel, voor kopie van verzoek):</label>
    <input type="email" name="email" id="email">

    <button type="submit">Verzend Verzoek</button>
</form>