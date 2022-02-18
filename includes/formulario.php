<main>
  <section>
    <a href="index.php">
      <button type="button" class="btn btn-success" name="button">voltar</button>
    </a>
  </section>
  <div class="mt-3">
    <h2 >Cadastrar Vaga</h2>

    <form method="post">
      <div class="form-group">
        <label>Título</label>
        <input type="text" class="form-control" name="titulo">
        <br/>
      </div>

      <div class="form-group">
        <label>Descrição</label>
        <textarea name="descricao" rows="5" class="form-control" ></textarea>
        <br/>
      </div>

      <div>
        <label>Status</label>
        <div class="col-12 col-md-12" >
          <div class="d-flex ">
            <label class="bg-white rounded text-dark col-2 col-md-1 p-2 mr-6">
              Ativo
              <input type="radio" checked name="ativo" value="s"/>
            </label>
            <label style="margin-left:15px;" class="bg-white rounded text-dark col-12 col-md-1 ml-6 p-2">
              Inativo
              <input type="radio" name="ativo" value="n"/>
            </label>
          </div>
        </div>
        <br/>
      </div>

      <div class="form-gorup">
        <button type="submit" class="btn btn-success">enviar</button>
      </div>

    </form>

  </div>
</main>
