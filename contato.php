            <div class="col-sm-12">
                <h4>Contato</h4>
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php" role="form">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nome" id="nome" required placeholder="Nome">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="telefone" id="telefone" required placeholder="Fone">
                          </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="cidade" id="cidade" required placeholder="Cidade">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" id="email" required placeholder="Email">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <textarea name="mensagem" id="mensagem" required class="form-control" rows="8" placeholder="Menssagem"></textarea>
                        </div>
                    </div>
                </form>
        </div>