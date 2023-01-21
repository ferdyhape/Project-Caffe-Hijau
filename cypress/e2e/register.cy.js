describe('template spec', () => {
  beforeEach(() => {
        cy.on('uncaught:exception', (err) => {
            // returning false here prevents Cypress from
            // failing the test
            console.log('Cypress detected uncaught exception: ', err);
            return false;
        });
        cy.visit('/register')
    })

    //TC-001
    it('user can access register page', () => {
        cy.get('.user > :nth-child(2) > .form-control').should('have.attr', 'placeholder', 'Name')
        cy.get(':nth-child(3) > .form-control').should('have.attr', 'placeholder', 'Email')
        cy.get('.mb-3 > .form-control').should('have.attr', 'placeholder', 'Password')
        cy.get('.row > :nth-child(2) > .form-control').should('have.attr', 'placeholder', 'Repeat Password')
        cy.get('.btn-primary').contains('Register Account').should('not.be.disabled')
        cy.get('.btn-google').contains('Register with Google').should('not.be.disabled')
        cy.get('.btn-facebook').contains('Register with Facebook').should('not.be.disabled')
        cy.get(':nth-child(4) > .small').contains('Forgot Password?')
        cy.get(':nth-child(5) > .small').contains('Already have an account? Login!')
        cy.get('.d-none').should('be.visible')
    })

    // TC-002
    it('user can register with all field filled correctly', () => {
        cy.get('.user > :nth-child(2) > .form-control').type('Atmayanti Cantik')
        cy.get(':nth-child(3) > .form-control').type('Atmayanti@gmail.com')
        cy.get('.mb-3 > .form-control').type('Patmayanti1-')
        cy.get('.row > :nth-child(2) > .form-control').type('Patmayanti1-')
        cy.get('.btn-primary').contains('Register Account').click()

        cy.get('.alert').contains('Registration is successful, please login')
        cy.url().should('contain', '/login')
    })

    //TC-003
    it('user can not register with empty field name', () => {
        cy.get(':nth-child(3) > .form-control').type('Atmayanti@gmail.com')
        cy.get('.mb-3 > .form-control').type('Patmayanti1-')
        cy.get('.row > :nth-child(2) > .form-control').type('Patmayanti1-')
        cy.get('.btn-primary').contains('Register Account').click()
    })

    //TC-004
    it('user can not register with empty field email', () => {
        cy.get('.user > :nth-child(2) > .form-control').type('Atmayanti Cantik')
        cy.get('.mb-3 > .form-control').type('Patmayanti1-')
        cy.get('.row > :nth-child(2) > .form-control').type('Patmayanti1-')
        cy.get('.btn-primary').contains('Register Account').click()
    })

    //TC-005
    it('user can not register with empty field password', () => {
        cy.get('.user > :nth-child(2) > .form-control').type('Atmayanti Cantik')
        cy.get(':nth-child(3) > .form-control').type('Atmayanti@gmail.com')
        cy.get('.row > :nth-child(2) > .form-control').type('Patmayanti1-')
        cy.get('.btn-primary').contains('Register Account').click()
    })

    //TC-006
    it('user can not register with empty field password confirmation', () => {
        cy.get('.user > :nth-child(2) > .form-control').type('Atmayanti Cantik')
        cy.get(':nth-child(3) > .form-control').type('Atmayanti@gmail.com')
        cy.get('.row > :nth-child(1) > .form-control').type('Patmayanti1-')
        cy.get('.btn-primary').contains('Register Account').click()
    })

    //TC-007
    it('user can not register using registered email', () => {
        cy.get('.user > :nth-child(2) > .form-control').type('Atmayanti')
        cy.get(':nth-child(3) > .form-control').type('Atmayanti@gmail.com')
        cy.get('.row > :nth-child(1) > .form-control').type('Patmayanti1-')
        cy.get('.row > :nth-child(2) > .form-control').type('Patmayanti1-')
        cy.get('.btn-primary').contains('Register Account').click()
        cy.get(':nth-child(3) > .invalid-feedback > strong').contains('The email has already been taken.')
    })

    //TC-008
    it('user can not register using password less than 6 character', () => {
        cy.get('.user > :nth-child(2) > .form-control').type('Atmayanti')
        cy.get(':nth-child(3) > .form-control').type('Atmayanti@gmail.com')
        cy.get('.row > :nth-child(1) > .form-control').type('11')
        cy.get('.row > :nth-child(2) > .form-control').type('11')
        cy.get('.btn-primary').contains('Register Account').click()
        cy.get('.mb-3 > .invalid-feedback > strong').contains('The password must be at least 6 characters.')
    })

    //TC-009
    it('user can not register using password without uppercase and lowercase letter', () => {
        cy.get('.user > :nth-child(2) > .form-control').type('Atmayanti')
        cy.get(':nth-child(3) > .form-control').type('Atmayanti@gmail.com')
        cy.get('.row > :nth-child(1) > .form-control').type('111111')
        cy.get('.row > :nth-child(2) > .form-control').type('111111')
        cy.get('.btn-primary').contains('Register Account').click()
        cy.get('.mb-3 > .invalid-feedback > strong').contains('The password must contain at least one uppercase and one lowercase letter.')
    })

    //TC-010
    it('user can not register using password without symbol', () => {
        cy.get('.user > :nth-child(2) > .form-control').type('Atmayanti')
        cy.get(':nth-child(3) > .form-control').type('Atmayanti@gmail.com')
        cy.get('.row > :nth-child(1) > .form-control').type('Aa111-')
        cy.get('.row > :nth-child(2) > .form-control').type('Aa111-')
        cy.get('.btn-primary').contains('Register Account').click()
        cy.get(':nth-child(3) > .invalid-feedback > strong').contains('The password must contain at least one symbol.')
    })

    //TC-011
    it('user can not register using leak password', () => {
        cy.get('.user > :nth-child(2) > .form-control').type('Atmayanti')
        cy.get(':nth-child(3) > .form-control').type('Atmayanti@gmail.com')
        cy.get('.row > :nth-child(1) > .form-control').type('12345678Aa-')
        cy.get('.row > :nth-child(2) > .form-control').type('12345678Aa-')
        cy.get('.btn-primary').contains('Register Account').click()
        cy.get('.mb-3 > .invalid-feedback > strong').contains('The given password has appeared in a data leak. Please choose a different password.')
    })
})
