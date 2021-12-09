<form action='#' method='post'>

    <h1>Mon profil</h1>

    <br />

    <label for="login">Login</label>
    <input type="text" name="login" value="<?= $userSession['login']; ?>">
    <p class="error"><?= $msg['login'] ?></p>

    <label for="password">Password</label>
    <input type="password" name="password" value="<?= $userSession['password']; ?>">
    <p class="error"><?= $msg['pwd'] ?></p>

    <label for="confirm-password">Confirm password</label>
    <input type="password" name="confirm-password" value="<?= $userSession['password']; ?>">
    <p class="error"><?= $msg['c-pwd'] ?></p>

    <input type="submit" class="btn" name="mod" value="Modifier"></input>
    <p class="valid"><?= $msg['valid'] ?></p>
</form>