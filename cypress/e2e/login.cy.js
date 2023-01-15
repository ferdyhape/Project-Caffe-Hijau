describe('login scenario', () => {
    beforeEach(() => {
        cy.on('uncaught:exception', (err) => {
            // returning false here prevents Cypress from
            // failing the test
            console.log('Cypress detected uncaught exception: ', err);
            return false;
        });
        cy.visit('/login')
    })

    //TC-001
    it('user can access login page', () => {
        cy.get('.h4').contains('Welcome Back!')
        cy.get(':nth-child(2) > .form-control').should('have.attr', 'placeholder', 'Email')
        cy.get(':nth-child(3) > .form-control').should('have.attr', 'placeholder', 'Password')
        cy.get('.custom-control-label').contains('Remember Me')
        cy.get('.btn-primary').contains('Login').should('not.be.disabled')
        cy.get('.btn-google').contains('Login with Google').should('not.be.disabled')
        cy.get('.btn-facebook').contains('Login with Facebook').should('not.be.disabled')
        cy.get('.p-5 > :nth-child(4) > .small').contains('Forgot Password?')
        cy.get(':nth-child(5) > .small').contains('Create an Account!')
        cy.get('.d-none').should('be.visible')
    })
})
