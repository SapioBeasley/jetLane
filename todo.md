## ToDo
- [ ] Table needed for contacts extra detail based on type
- [ ] Check image upload on user create
- [ ] If person is client of prospect we need to be able to add more information to the user
- [ ] Need to create loans table with below columns
- [ ] Create field in loans for loan_id
- [ ] Create field in loans for lender (related to lender table)
- [ ] Create field in loans for loan title
- [ ] Create field in loans for loan subtitle
- [ ] Create field in loans for conforming_load (y/n)
- [ ] Create field in loans for fha (y/n)
- [ ] Create field in loans for ba (y/n)
- [ ] Create field in loans for conventional (y/n)
- [ ] Create field in loans for term
- [ ] Create field in loans for rate
- [ ] Create field in loans for front_end_limit
- [ ] Create field in loans for back_end_limir
- [ ] Create field in loans for min_down_payment
- [ ] Create field in loans for front end mortgate insurence
- [ ] Create field in loans for payment mortgage insurence
- [ ] Create field in loans for lender fees
- [ ] Create field in loans for origination fee
- [ ] Create field in loans for owner occupant only (y/n)
- [ ] Create field in loans for second home(y/n)
- [ ] Create field in loans for two loans (y/n)
- [ ] Create field in loans for loan limits
- [ ] Filter contacts by types
- [ ] find api for national average interest rates
- [ ] Look into loan data api
- [ ] Add wheel menu
- [ ] Companies are the relationship in loans
- [ ] when you search company list the people associated
- [ ] Able to create duplicate loan from already created

**Done**
- [x] Add 'canView' array to each contact
- [x] move route '/'' into controller and add auth construct
- [x] Add Group permissions for each contact. Users need permission roles so they do not see others contacts
- [x] Change both models belongToMany into createdBy
- [x] Add column to both people and company contacts table name 'createdBy'
- [x] For the create methods of people and contacts, instead of sync to created by, use as the can view
- [x] Edit both seeders from created by to canView
- [x] add user persmissions

## Later
We will need the ability to add type specific data

## Whats needed 99% of time for realtors
- [ ] Broker Analysis
- [ ] Payment Analysis
- [ ] Net Sheets for sellers

## Concerns to fix
- [ ] If a user knows  contacts ID they will be able to append to the url and view. Need to keep that from happening

## Questions
**Need to ask**

**Asked**
- [x] Can everyone see all companies or will they only be viewable by users who are 'canView'?

**Answered**
