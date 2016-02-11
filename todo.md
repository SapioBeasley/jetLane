## ToDo
- [ ] Filter contacts by types
- [ ] find api for national average interest rates
- [ ] Look into loan data api
- [ ] Add wheel menu
- [ ] Table needed for contacts extra detail based on type
- [ ] add user persmissions
- [ ] Add column to both people and company contacts table name 'createdBy'
- [ ] Change both models belongToMany into createdBy
- [ ] For the create methods of people and contacts, instead of sync to created by, use as the can view

**Done**
- [x] Add 'canView' array to each contact
- [x] move route '/'' into controller and add auth construct
- [x] Add Group permissions for each contact. Users need permission roles so they do not see others contacts

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
