<?php $title = 'Chat'; ?>
<?php ob_start(); ?>
<div class="container">
    <h3 class=" text-center">Chat application | <a href="/logout"> Déconnexion</a></h3>
    <div class="messaging">
        <div class="inbox_msg">
            <div class="inbox_people">
                <div class="headind_srch">
                    <div class="recent_heading">
                        <a href="/">
                            <h4>Retour</h4>
                        </a>
                    </div>

                </div>
                <div class="inbox_chat">
                    <?php foreach ($conversations as $conversation): ?>
                    <a href="chat?id=<?= $conversation['user_id'] ?>">
                        <div class="chat_list <?= check_active($conversation['user_id'],$user->id) ?>">
                            <div class="chat_people">
                                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                        alt="<?= $conversation['name'] ?>">
                                </div>
                                <div class="chat_ib">
                                    <h5><?= $conversation['name'] ?>
                                        <span class="chat_date">
                                            <span class="timeago"
                                                title="<?= $conversation['createdAt'] ?>"><?= $conversation['createdAt'] ?></span>&ensp;
                                            <span class="fa fa-clock-o mr-2"></span>
                                        </span>
                                    </h5>
                                    <p class="d-inline-block text-truncate" style="max-width: 200px;">
                                        <?= $conversation['contenu'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php endforeach ?>


                </div>
            </div>
            <?php if(!$user): ?>
            <div class="d-flex align-items-center justify-content-center mesgs">
                <h4>Cet utilisateur inexistant</h4>

            </div>
            <?php else:?>
            <div class="mesgs">
                <div class="msg_history">
                    <?php foreach ($messages as $message): ?>
                    <?php if ($message->user_id != getSession("user_id")) : ?>
                    <div class="incoming_msg">
                        <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                alt="sunil"> </div>
                        <div class="received_msg">
                            <div class="received_withd_msg">
                                <p><?= $message->contenu ?></p>
                                <span class="time_date">
                                    <span class="timeago"
                                        title="<?= $message->createdAt ?>"><?= $message->createdAt ?></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <?php else : ?>
                    <div class="outgoing_msg">
                        <div class="sent_msg">
                            <p><?= $message->contenu ?></p>
                            <span class="time_date">
                                <span class="timeago"
                                    title="<?= $message->createdAt ?>"><?= $message->createdAt ?></span>
                            </span>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach ?>
                </div>
                <div class="type_msg">
                    <form method="POST" data-parsley-validate>
                        <div class="input_msg_write">
                            <input type="text" class="write_msg" placeholder="Tapez un message"
                                value="<?= get_input_data('message') ?>" name="message" required />
                            <button class="msg_send_btn" type="submit" name="send"><i class="fa fa-paper-plane-o"
                                    aria-hidden="true"></i></button>
                        </div>
                    </form>

                </div>
            </div>
            <?php endif; ?>

        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('src/View/template.php'); ?>