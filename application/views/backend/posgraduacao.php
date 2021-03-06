<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $subtitulo ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <?php echo 'Adicionar'.' '.$subtitulo?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                                echo validation_errors('<div class="alert alert-danger">','</div>');
                                echo form_open('admin/posgraduacao/inserir');
                             ?>
                             <div class="form-group">
                                 <br/>
                                 <label id="txt-curso">Nome do Curso</label>
                                 <input id="txt-curso" name="txt-curso" type="text" class="form-control" placeholder="Digite o nome do curso de Pós-graduação">
                                 <br/>

                                 <label id="txt-link">Link</label>
                                 <input id="txt-link" name="txt-link" type="text" class="form-control" placeholder="Link">
                                 <br/>
                                 <label id="txt-link">Link do video</label>
                                 <input id="txt-link" name="txt-video" type="text" class="form-control" placeholder="Link do video" >
                                 <br/>

                             <button type="submit" class="btn btn-primary">Cadastrar</button>
                            <?php
                                echo form_close();
                             ?>
                        </div>
                    </div>

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <?php echo 'Alterar'.' '.$subtitulo ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                                $this->table->set_heading("Nome da Pós-Graduação","Alterar Dados","Excluir");
                                foreach($cursos as $curso){
                                    $nomecurso = $curso->titulo;
                                    $alterar = anchor(base_url('admin/posgraduacao/pagina_alterar/'.$curso->id),'<button type="button" class="btn btn-link"><span style="color:#337ab7"><i class="fa fa-refresh fa-fw"></i>Alterar</span></button>');
                                    $excluir = $excluir= '<button type="button" class="btn btn-link" data-toggle="modal" data-target=".excluir-modal-'.$curso->id.'"><span style="color:red"><i class="fa fa-remove fa-fw"></i> Excluir</span></button>';
                                    echo $modal= ' <div class="modal fade excluir-modal-'.$curso->id.'" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel2">Exclusão de Pós-graduação</h4>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Deseja Realmente excluir o curso de pós-graduação '.$curso->titulo.'?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                <a type="button" class="btn btn-primary" href="'.base_url("admin/posgraduacao/remover/".$curso->id).'">Excluir</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>';

                                    $this->table->add_row($nomecurso,$alterar,$excluir);
                                }
                                $this->table->set_template(array('table_open' => '<table class="table table-striped">'));
                                echo $this->table->generate();
                             ?>
                        </div>

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
