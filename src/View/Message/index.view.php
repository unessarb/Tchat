<?php $title = 'Messages'; ?>
<?php ob_start(); ?>
<div class="container">
    <h3 class=" text-center">Chat application | <a href="/logout"> Déconnexion</a></h3>
    <div class="messaging">
        <div class="inbox_msg">
            <div class="inbox_people">
                <ul class="nav nav-pills m-3 " id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="archive-tab" data-toggle="tab" href="#archive" role="tab"
                            aria-controls="archive" aria-selected="true">Archives</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nouveau-tab" data-toggle="tab" href="#nouveau" role="tab"
                            aria-controls="nouveau" aria-selected="false">Nouveau message</a>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="archive" role="tabpanel" aria-labelledby="archive-tab">
                        <div class="inbox_chat">
                            <?php foreach ($messages as $message): ?>
                            <a href="chat?id=<?= $message['user_id'] ?>">
                                <div class="chat_list">
                                    <div class="chat_people">
                                        <div class="chat_img"> <img
                                                src="https://ptetutorials.com/images/user-profile.png"
                                                alt="<?= $message['name'] ?>">
                                        </div>
                                        <div class="chat_ib">
                                            <h5><?= $message['name'] ?>
                                                <span class="chat_date">
                                                    <span class="timeago"
                                                        title="<?= $message['createdAt'] ?>"><?= $message['createdAt'] ?></span>&ensp;
                                                    <span class="fa fa-clock-o mr-2"></span>
                                                </span>
                                            </h5>
                                            <p class="d-inline-block text-truncate" style="max-width: 200px;">
                                                <?= $message['contenu'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nouveau" role="tabpanel" aria-labelledby="nouveau-tab">
                        <div class="inbox_chat">
                            <?php foreach ($users as $user): ?>
                            <a href="chat?id=<?= $user->id ?>">

                                <div class="chat_list">
                                    <div class="chat_people">
                                        <div class="chat_img"> <img
                                                src="https://ptetutorials.com/images/user-profile.png"
                                                alt="<?= $user->name ?>">
                                        </div>
                                        <div class="chat_ib">
                                            <h5><?= $user->name ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <?php endforeach ?>

                        </div>
                    </div>
                </div>


            </div>
            <div class="d-flex align-items-center justify-content-center mesgs">
                <h4>Sélectionner un utilisateur</h4>

            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('src/View/template.php'); ?>