@extends('app')

@section('pageTitle', 'Home')

@section('content')

<div class="container">
      <button class="button mt-4" id="addCostumer">Dodaj Kupca</button>
    </div>
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
</div>

<script scoped>
  //modal
  const addButton = document.querySelector('#addCostumer');
  const modalBg = document.querySelector('.modal-background');
  const modal = document.querySelector('.modal');

  addButton.addEventListener('click', ()=>{
    modal.classList.add('is-active');
  });

  modalBg.addEventListener('click', ()=>{
    modal.classList.remove('is-active');
  });
</script>