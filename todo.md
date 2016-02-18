## ToDo
- [ ] Table needed for contacts extra detail based on type
- [ ] If person is client of prospect we need to be able to add more information to the user, same foro company
- [ ] Create field in loans for front_end_limit
- [ ] Create field in loans for back_end_limit
- [ ] Create field in loans for conforming_load
- [ ] Create field in loans for front end mortgate insurence
- [ ] Seasoned burnoff (if user has forclosure how many years out do they ned to be)
- [ ] Create field in loans for loan limits
- [ ] If user is client or prospect, add section on show to tell agent to gather additional information from client (prequal meeting time)
- [ ] Filter contacts by types
- [ ] find api for national average interest rates
- [ ] Look into loan data api
- [ ] Add wheel menu
- [ ] Add reffered by to people contact
- [ ] If secondary person is entered need to create both at same time. Secondary person will not have the same information
- [ ] Companies are the relationship in loans
- [ ] when you search company list the people associated
- [ ] Able to create duplicate loan from already created
- [ ] Only companies and people that are type lenders can be added to the loans pivot
- [ ] Loans are listed under company
- [ ] When creating a transaction is when the loan is either created or duplicated
- [ ] If company has multiple locations, how can we select the correct address to associate that address to person
- [ ] Build properties required array Fields from rets
- [ ] Print fliers for properties
- [ ] generate comps for properties

**Done**
- [x] Add 'canView' array to each contact
- [x] move route '/'' into controller and add auth construct
- [x] Add Group permissions for each contact. Users need permission roles so they do not see others contacts
- [x] Change both models belongToMany into createdBy
- [x] Add column to both people and company contacts table name 'createdBy'
- [x] For the create methods of people and contacts, instead of sync to created by, use as the can view
- [x] Edit both seeders from created by to canView
- [x] add user persmissions
- [x] Avatar on create works, update needs to be fixed
- [x] Check image upload on user create
- [ ] Need to create loans table with below columns
- [ ] Create field in loans for loan_id
- [ ] Create field in loans for lender (related to lender table)
- [ ] Create field in loans for loan title
- [ ] Create field in loans for loan subtitle
- [ ] Create field in loans for fha (y/n)
- [ ] Create field in loans for va (y/n)
- [ ] Create field in loans for conventional (y/n)
- [ ] Create field in loans for term
- [ ] Create field in loans for rate
- [ ] Create field in loans for min_down_payment
- [ ] Bankrupcy burnoff (if user has bankrupcy how many years out do they ned to be)
- [ ] Create field in loans for lender fees
- [ ] Minimun fico number
- [ ] Create field in loans for origination fee
- [ ] Create field in loans for owner occupant only (y/n)
- [ ] Create field in loans for second home(y/n)
- [ ] Create field in loans for two loans (y/n)

## Later
We will need the ability to add type specific data

## Whats needed 99% of time for realtors
- [ ] Broker Analysis
- [ ] Payment Analysis
- [ ] Net Sheets for sellers

## Concerns to fix
- [ ] If a user knows a contacts ID they will be able to append to the url and view. Need to keep that from happening

## Questions
**Need to ask**

**Asked**
- [x] Can everyone see all companies or will they only be viewable by users who are 'canView'?
- [x] If user is a client what extra fields are required for the prequal meeting
- [x] What type of values are expected for these? front_end_limit, back_end_limit, front_end_mortgate_insurence, loan_limit
- [x] What other "burnoff" items will their be?
- [x] Is "Seasoned burnoff" an actual field to be added of was it a general name?
- [x] conforming_load with a value of either y/n is a correct field? I may have caught it wrong.

**Answered**
