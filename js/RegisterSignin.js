
(function () {
    const modalSignIn = document.getElementById('signin-modal');
    const modalRegister = document.getElementById('register-modal');
    const openSignInBtn = document.getElementById('openSignIn');
    const openRegisterFromSignIn = document.getElementById('openRegisterFromSignIn');
    const openSignInFromRegister = document.getElementById('openSignInFromRegister');
    const closeSignInBtn = document.getElementById('closeSignIn');
    const closeRegisterBtn = document.getElementById('closeRegister');

    function openModal(modal) {
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    function closeModal(modal) {
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }

    function openSignIn(e) {
        e.preventDefault();
        closeModal(modalRegister);
        openModal(modalSignIn);
    }
    function openRegister(e) {
        e.preventDefault();
        closeModal(modalSignIn);
        openModal(modalRegister);
    }

    if (openSignInBtn) openSignInBtn.addEventListener('click', openSignIn);
    if (openRegisterFromSignIn) openRegisterFromSignIn.addEventListener('click', openRegister);
    if (openSignInFromRegister) openSignInFromRegister.addEventListener('click', openSignIn);
    if (closeSignInBtn) closeSignInBtn.addEventListener('click', function () { closeModal(modalSignIn); });
    if (closeRegisterBtn) closeRegisterBtn.addEventListener('click', function () { closeModal(modalRegister); });

    [modalSignIn, modalRegister].forEach(modal => {
        modal.addEventListener('click', function (e) {
            if (e.target === modal) closeModal(modal);
        });
    });

    document.addEventListener('keyup', function (e) {
        if (e.key === 'Escape') {
            closeModal(modalSignIn);
            closeModal(modalRegister);
        }
    });
})();