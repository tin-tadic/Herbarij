@extends('app')

@section('pageTitle', 'Customers')

@section('content')
<br><br><br>
<section class="section">
  <div class="container">
    <h3 class="title has-text-centered is-size-4">Kupci</h3>
    <div class="columns mt-5 is-8 is-variable is-centered">
    
      <div class="column is-4-tablet is-3-desktop">
        <div class="card">
        <div class="card-image has-text-centered px-6">
          <img src="public\storage\assets\user.png" alt="customer image">
        </div>
        <div class="card-content">
          <p>Ovdje ide ime</p>
          <p>Ovdje ide prezime ako ima</p>
          <p>Ovdje ide adresa</p>
        </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <button class="button mt-4" id="addCostumer">Dodaj Kupca</button>
  </div>
</section>




<div class="modal">
  <div class="modal-background">
    <div class="modal-content has-background-white py-5 px-5">
      <h3 class="title mb-6">Dodaj novog kupca</h3>
      <form>
        <div class="field">
          <label class="label">Ime</label>
          <div class="control">
            <input type="text" class="input" placeholder="Ime">
          </div>
        </div>
        <div class="field">
          <label class="label">Prezime</label>
          <div class="control">
            <input type="text" class="input" placeholder="Prezime">
          </div>
        </div>
        <div class="field">
          <label class="label">Adresa</label>
          <div class="control">
            <input type="text" class="input" placeholder="npr. Kralja Tomislava 72A, Mostar">
          </div>
        </div>
        <div class="field">
          <label class="label">Tip kupca</label>
          <div class="control mb-6">
            <div class="select is-dark">
                <select>
                    <option>Pojedinac</option>
                    <option>Tvrtka</option>
                </select>
            </div>
        </div>
        </div>
        <button class="button is-rounded">Dodaj Kupca</button>
      </form>
    </div>
  </div>
</div>


<style scoped>

</style>
<script scoped>
  //modal
  const addButton = document.querySelector('#addCostumer');
  const modalBg = document.querySelector('.modal-background');
  const modal = document.querySelector('.modal');

  addButton.addEventListener('click', ()=>{
    modal.classList.add('is-active');
  });

  /*modalBg.addEventListener('click', ()=>{
    modal.classList.remove('is-active');
  });*/
</script>